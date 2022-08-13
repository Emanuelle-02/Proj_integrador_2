from config import db
from .entities import Entregas
from flask import jsonify, request

def get_todas_entregas():
  entregas = Entregas.query.all()
  return jsonify([entrega.to_json() for entrega in entregas]), 200

def get_by_id(id):
  entregas = Entregas.query.get(id)
  if entregas is None:
    return "Not found", 404
  return jsonify(entregas.to_json())

def get_entregas_farma(id_entrega, id_cliente):
  entregas = Entregas.query.filter_by(id_entrega = id_entrega, id_cliente = id_cliente).first()
  if entregas is None:
    return {"error": "Not found"}, 404
  return jsonify(entregas.to_json())

def insert():
  if request.is_json:
    body = request.get_json()
    entregas = Entregas (
        id_cliente = body['id_cliente'],
        id_entregador = body['id_entregador'],
        entrega_status = body['entrega_status'],
    )
    db.session.add(entregas)
    db.session.commit()
    return jsonify(entregas.to_json()), 201
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
  db.session.delete(entrega)
  db.session.commit()
  return "deletado com sucesso", 200