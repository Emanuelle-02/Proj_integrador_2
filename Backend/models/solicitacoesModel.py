from config import db
from flask import jsonify, request

class Solicitacoes(db.Model):
  id_solicitacao = db.Column(db.Integer, primary_key=True)
  id_cliente = db.Column(db.Integer, db.ForeignKey('farmacias.id'))
  nome = db.Column(db.String(50))
  rua = db.Column(db.String(50))
  numero = db.Column(db.Integer)
  bairro = db.Column(db.String(50))
  cidade = db.Column(db.String(50))
  entrega_status = db.Column(db.String(30), default="Pendente")
  created_at  = db.Column(db.DateTime, server_default=db.func.now())
  updated_at = db.Column(db.DateTime, server_default=db.func.now(), server_onupdate=db.func.now())

  def get_data(self):
    return {
      "id_solicitacao": self.id_solicitacao,
      "id_cliente": self.id_cliente,
      "nome": self.nome,
      "rua": self.rua,
      "numero": self.numero,
      "bairro": self.bairro,
      "cidade": self.cidade,
      "entrega_status": self.entrega_status,
      "created_at": self.created_at,
      "updated_at": self.updated_at
    }

def get_todas_solicitacoes():
  solicitacoes = Solicitacoes.query.all()
  return jsonify([solicitacao.get_data() for solicitacao in solicitacoes]), 200

def get_by_id(id):
  solicitacoes = Solicitacoes.query.get(id)
  if solicitacoes is None:
    return "Not found", 404
  return jsonify(solicitacoes.get_data())

def insert():
  if request.is_json:
    body = request.get_data()
    solicitacoes = Solicitacoes (
        id_cliente = body['id_cliente'],
        nome = body["nome"], 
        rua = body["rua"],
        numero = body["numero"], 
        bairro = body["bairro"], 
        cidade = body['cidade'],
        entrega_status = body['entrega_status'],

    )
    db.session.add(solicitacoes)
    db.session.commit()
    return "criado com sucesso", 201
  return {"error": "Request must be JSON"}, 415

def update(id):
  if request.is_json:
    body = request.get_json()
    solicitacao = Solicitacoes.query.get(id)
    if solicitacao is None:
      return "Not found", 404
    if("id_cliente" in body):
      solicitacao.id_cliente = body["id_cliente"]
    if("nome" in body):
      solicitacao.nome = body["nome"]
    if("rua" in body):
      solicitacao.rua = body["rua"]
    if("numero" in body):
      solicitacao.numero = body["numero"]
    if("bairro" in body):
      solicitacao.bairro = body["bairro"]
    if("cidade" in body):
      solicitacao.cidade = body["cidade"]
    if("entrega_status" in body):
      solicitacao.entrega_status = body["entrega_status"]
    db.session.add(solicitacao)
    db.session.commit()
    return "atualizado com sucesso", 200
  return {"error": "Request must be JSON"}, 415

def delete(id):
  solicitacao = Solicitacoes.query.get(id)
  if solicitacao is None:
      return "Not found", 404
  db.session.add(solicitacao)
  db.session.commit()
  return "deletado com sucesso", 200