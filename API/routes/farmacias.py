from flask import Blueprint
from controllers import farmaciasController

app=Blueprint('farmacias', __name__)

@app.route('/farmacias', methods=["GET"])
def get_farmacias():
  return farmaciasController.get_todas_farmacias()

@app.route("/farmacias/<int:id>", methods=["GET"])
def get_farmacia_by_id(id):
  return farmaciasController.get_by_id(id)

@app.route("/farmacias/email/<email>" , methods=["GET"])
def get_entregador_by_email(email):
  return farmaciasController.get_by_email(email)

@app.route("/farmacias", methods=["POST"])
def add_farmacia():
  return farmaciasController.insert()

@app.route("/farmacias/<int:id>", methods=["PUT"])
def update_farmacias(id):
  return farmaciasController.update(id)

@app.route("/farmacias/<int:id>", methods=["DELETE"])
def delete_farmacia(id):
  return farmaciasController.delete(id)