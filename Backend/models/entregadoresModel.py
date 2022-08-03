from config import db
from flask import jsonify, request

class Entregadores(db.Model):
  id_entregador = db.Column(db.Integer, primary_key=True)
  nome = db.Column(db.String(50))
  cpf = db.Column(db.String(30), unique=True)
  email = db.Column(db.String(50), unique=True)
  telefone = db.Column(db.String(50), unique=True)
  created_at  = db.Column(db.DateTime, server_default=db.func.now())
  updated_at = db.Column(db.DateTime, server_default=db.func.now(), server_onupdate=db.func.now())

  def get_data(self):
    return {
      "id_entregador": self.id_entregador,
      "nome": self.nome,
      "cpf": self.cpf,
      "email": self.email,
      "telefone": self.telefone,
      "created_at": self.created_at,
      "updated_at": self.updated_at
    }

  def get_todos_entregadores():
    entregadores = Entregadores.query.all()
    return jsonify([entregs.get_data() for entregs in entregadores]), 200

def get_by_id(id):
  entregadores = Entregadores.query.get(id)
  if entregadores is None:
    return "Error. Not found", 404
  return jsonify(entregadores.get_data())

def insert():
  if request.is_json:
    body = request.get_data()
    entregadores = Entregadores (
        nome = body["nome"],
        cpf = body["cpf"],
        email = body["email"], 
        telefone = body["telefone"] 
    )
    db.session.add(entregadores)
    db.session.commit()
    return "criado com sucesso", 201
  return {"error": "Request must be JSON"}, 415

def update(id):
  if request.is_json:
    body = request.get_json()
    entregs = Entregadores.query.get(id)
    if entregs is None:
      return "Error. Not found", 404
    if("nome" in body):
      entregs.nome = body["nome"]
    if("cpf" in body):
      entregs.cpf = body["cpf"]
    if("email" in body):
      entregs.email = body["email"]
    if("telefone" in body):
      entregs.telefone = body["telefone"]
    db.session.add(entregs)
    db.session.commit()
    return "atualizado com sucesso", 200
  return {"error": "Request must be JSON"}, 415

def delete(id):
  entregs = Entregadores.query.get(id)
  if entregs is None:
      return "Error. Not found", 404
  db.session.add(entregs)
  db.session.commit()
  return "deletado com sucesso", 200