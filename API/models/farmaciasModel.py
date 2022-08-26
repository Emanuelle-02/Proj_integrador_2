import jwt
import datetime
from config import db
from .entities import Farmacias
from flask import jsonify, request
from config import app

def get_todas_farmacias(current_user):
  farmacias = Farmacias.query.all()
  return jsonify([farms.to_json() for farms in farmacias]), 200

def get_by_id(current_user, id):
  farmacias = Farmacias.query.get(id)
  if farmacias is None:
    return "Error. Not found", 404
  return jsonify(farmacias.to_json())

def get_by_email(current_user, email):
  farmacias = Farmacias.query.filter_by(email=email).first()
  if farmacias is None:
    return "Error. Not found", 404
  return jsonify(farmacias.to_json())

def insert(current_user):
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
        cidade = body['cidade'],
        password = body['password'] 
    )
    db.session.add(farmacias)
    db.session.commit()
    payload = {
      "email": farmacias.email,
      "exp": datetime.datetime.utcnow()
    }
    token = jwt.encode(payload,app.config["SECRET_KEY"])
    return jsonify(farmacias.to_json(),token), 201
  return {"error": "Request must be JSON"}, 415

def update(current_user,id):
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
    if("active" in body):
      farms.active = body["active"]
    if("password" in body):
      farms.active = body["password"]
    db.session.add(farms)
    db.session.commit()
    return "atualizado com sucesso", 200
  return {"error": "Request must be JSON"}, 415

def delete(current_user,id):
  farmacias = Farmacias.query.get(id)
  if farmacias is None:
      return "Error. Not found", 404
  farmacias.active = False
  db.session.add(farmacias)
  db.session.commit()
  return "deletado com sucesso", 200