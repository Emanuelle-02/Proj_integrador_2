from flask import Blueprint
from controllers import entregadoresController

app=Blueprint('entregadores', __name__)

@app.route('/entregadores', methods=["GET"])
def get_entregadores():
  return entregadoresController.get_todos_entregadores()

@app.route("/entregadores/<int:id>", methods=["GET"])
def get_entregador_by_id(id):
  return entregadoresController.get_by_id(id)

@app.route("/entregadores/email/<email>" , methods=["GET"])
def get_entregador_by_email(email):
  return entregadoresController.get_by_email(email)

@app.route("/entregadores", methods=["POST"])
def add_entregadores():
  return entregadoresController.insert()

@app.route("/entregadores/<int:id>", methods=["PUT"])
def update_entregador(id):
  return entregadoresController.update(id)

@app.route("/entregadores/<int:id>", methods=["DELETE"])
def delete_entregador(id):
  return entregadoresController.delete(id)