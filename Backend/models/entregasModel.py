from config import db
from flask import jsonify, request

class Entregas(db.Model):
  id_entrega = db.Column(db.Integer, primary_key=True)
  id_cliente = db.Column(db.Integer, db.ForeignKey('farmacias.id'))
  id_entregador = db.Column(db.Integer, db.ForeignKey('entregadores.id_entregador'))
  entrega_status = db.Column(db.String(30), db.ForeignKey('solicitacoes.entrega_status'))
  created_at  = db.Column(db.DateTime, server_default=db.func.now())
  updated_at = db.Column(db.DateTime, server_default=db.func.now(), server_onupdate=db.func.now())

  def get_data(self):
    return {
      "id_entrega": self.id_entrega,
      "id_cliente": self.id_cliente,
      "id_entregador": self.id_entregador,
      "entrega_status": self.entrega_status,
      "created_at": self.created_at,
      "updated_at": self.updated_at
    }

def get_todas_entregas():
  entregas = Entregas.query.all()
  return jsonify([entrega.get_data() for entrega in entregas]), 200

def get_by_id(id):
  entregas = Entregas.query.get(id)
  if entregas is None:
    return "Not found", 404
  return jsonify(entregas.get_data())

def get_entregas_farma(id_entrega, id_cliente):
  entregas = Entregas.query.filter_by(id_entrega = id_entrega, id_cliente = id_cliente).first()
  if entregas is None:
    return {"error": "Not found"}, 404
  return jsonify(entregas.get_data())

def insert():
  if request.is_json:
    body = request.get_data()
    entregas = Entregas (
        id_cliente = body['id_cliente'],
        entrega_status = body['entrega_status'],

    )
    db.session.add(entregas)
    db.session.commit()
    return "criado com sucesso", 201
  return {"error": "Request must be JSON"}, 415

def update(id):
  if request.is_json:
    body = request.get_json()
    entrega = Entregas.query.get(id)
    if entrega is None:
      return "Not found", 404
    if("id_cliente" in body):
      entrega.id_cliente = body["id_cliente"]
    if("id_entregador" in body):
      entrega.id_entregador = body["id_entregador"]
    if("entrega_status" in body):
      entrega.entrega_status = body["entrega_status"]
    db.session.add(entrega)
    db.session.commit()
    return "atualizado com sucesso", 200
  return {"error": "Request must be JSON"}, 415

def delete(id):
  entrega = Entregas.query.get(id)
  if entrega is None:
      return "Not found", 404
  db.session.add(entrega)
  db.session.commit()
  return "deletado com sucesso", 200