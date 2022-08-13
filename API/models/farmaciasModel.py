from config import db
from .entities import Farmacias
from flask import jsonify, request

def get_todas_farmacias():
  farmacias = Farmacias.query.all()
  return jsonify([farms.to_json() for farms in farmacias]), 200

def get_by_id(id):
  farmacias = Farmacias.query.get(id)
  if farmacias is None:
    return "Error. Not found", 404
  return jsonify(farmacias.to_json())

def insert():
  if request.is_json:
    body = request.get_json()
    farmacias = Farmacias (
        nome_farmacia = body["nome_farmacia"],
        email = body["email"], 
        cnpj = body["cnpj"],
        telefone = body["telefone"], 
        rua = body["rua"],
        numero = body["numero"], 
        bairro = body["bairro"], 
        cidade = body['cidade'] 
    )
    db.session.add(farmacias)
    db.session.commit()
    return jsonify(farmacias.to_json()), 201
  return {"error": "Request must be JSON"}, 415

def update(id):
  if request.is_json:
    body = request.get_json()
    farms = Farmacias.query.get(id)
    if farms is None:
      return "Error. Not found", 404
    if("nome_farmacia" in body):
      farms.nome_farmacia = body["nome_farmacia"]
    if("email" in body):
      farms.email = body["email"]
    if("cnpj" in body):
      farms.cnpj = body["cnpj"]
    if("telefone" in body):
      farms.telefone = body["telefone"]
    if("rua" in body):
      farms.rua = body["rua"]
    if("numero" in body):
      farms.numero = body["numero"]
    if("bairro" in body):
      farms.bairro = body["bairro"]
    if("cidade" in body):
      farms.cidade = body["cidade"]
    db.session.add(farms)
    db.session.commit()
    return "atualizado com sucesso", 200
  return {"error": "Request must be JSON"}, 415

def delete(id):
  farmacias = Farmacias.query.get(id)
  if farmacias is None:
      return "Error. Not found", 404
  db.session.delete(farmacias)
  db.session.commit()
  return "deletado com sucesso", 200