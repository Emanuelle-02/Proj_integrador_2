from config import db
from flask import jsonify, request

class Farmacias(db.Model):
  id = db.Column(db.Integer, primary_key=True)
  nome_farmacia = db.Column(db.String(50))
  email = db.Column(db.String(50))
  cnpj = db.Column(db.String(50))
  telefone = db.Column(db.String(50))
  rua = db.Column(db.String(50))
  numero = db.Column(db.Integer)
  bairro = db.Column(db.String(50))
  cidade = db.Column(db.String(50))
  created_at  = db.Column(db.DateTime, server_default=db.func.now())
  updated_at = db.Column(db.DateTime, server_default=db.func.now(), server_onupdate=db.func.now())

  def get_data(self):
    return {
      "id": self.id,
      "nome_farmacia": self.nome_farmacia,
      "email": self.email,
      "cnpj": self.cnpj,
      "telefone": self.telefone,
      "rua": self.rua,
      "numero": self.numero,
      "bairro": self.bairro,
      "cidade": self.cidade,
      "created_at": self.created_at,
      "updated_at": self.updated_at
    }

def get_todas_farmacias():
  farmacias = Farmacias.query.all()
  return jsonify([farms.get_data() for farms in farmacias]), 200

def get_by_id(id):
  farmacias = Farmacias.query.get(id)
  if farmacias is None:
    return "Error. Not found", 404
  return jsonify(farmacias.get_data())

def insert():
  if request.is_json:
    body = request.get_data()
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
    return "criado com sucesso", 201
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
  farms = Farmacias.query.get(id)
  if farms is None:
      return "Error. Not found", 404
  db.session.add(farms)
  db.session.commit()
  return "deletado com sucesso", 200