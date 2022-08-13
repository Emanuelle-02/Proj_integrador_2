from config import db
from .entities import Solicitacoes
from flask import jsonify, request

def get_todas_solicitacoes():
  solicitacoes = Solicitacoes.query.all()
  return jsonify([solicitacao.to_json() for solicitacao in solicitacoes]), 200

def get_by_id(id):
  solicitacoes = Solicitacoes.query.get(id)
  if solicitacoes is None:
    return "Not found", 404
  return jsonify(solicitacoes.to_json())

def insert():
  if request.is_json:
    body = request.get_json()
    solicitacoes = Solicitacoes (
        id_cliente = body['id_cliente'],
        nome = body["nome"], 
        rua = body["rua"],
        numero = body["numero"], 
        bairro = body["bairro"], 
        cidade = body['cidade'],
    )
    db.session.add(solicitacoes)
    db.session.commit()
    return jsonify(solicitacoes.to_json()), 201
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
    db.session.add(solicitacao)
    db.session.commit()
    return "atualizado com sucesso", 200
  return {"error": "Request must be JSON"}, 415

def delete(id):
  solicitacao = Solicitacoes.query.get(id)
  if solicitacao is None:
      return "Not found", 404
  db.session.delete(solicitacao)
  db.session.commit()
  return "deletado com sucesso", 200