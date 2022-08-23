from config import db
from .entities import Entregadores
from flask import jsonify, request

def get_todos_entregadores():
    entregadores = Entregadores.query.all()
    return jsonify([entregs.to_json() for entregs in entregadores]), 200

def get_by_id(id):
  entregadores = Entregadores.query.get(id)
  if entregadores is None:
    return "Error. Not found", 404
  return jsonify(entregadores.to_json())

def get_by_email(email):
  entregadores = Entregadores.query.filter_by(email=email).first()
  if entregadores is None:
    return "Error. Not found", 404
  return jsonify(entregadores.to_json())

def insert():
  if request.is_json:
    body = request.get_json()
    entregadores = Entregadores (
        nome = body["nome"],
        cpf = body["cpf"],
        email = body["email"], 
        telefone = body["telefone"], 
        senha = body["senha"] 
    )
    db.session.add(entregadores)
    db.session.commit()
    return jsonify(entregadores.to_json()), 201
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
    if("active" in body):
      entregs.active = body["active"]
    if("senha" in body):
      entregs.senha = body["senha"]
    db.session.add(entregs)
    db.session.commit()
    return "atualizado com sucesso", 200
  return {"error": "Request must be JSON"}, 415

def delete(id):
  entregs = Entregadores.query.get(id)
  if entregs is None:
      return "Error. Not found", 404
  entregs.active = False
  db.session.add(entregs)
  db.session.commit()
  return "deletado com sucesso", 200