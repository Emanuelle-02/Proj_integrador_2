from flask import Blueprint
from controllers import entregadoresController
from auth import token_required

app=Blueprint('entregadores', __name__)

@app.route('/entregadores', methods=["GET"])
@token_required
def get_entregadores(current_user):
  return entregadoresController.get_todos_entregadores(current_user)

@app.route("/entregadores/<int:id>", methods=["GET"])
@token_required
def get_entregador_by_id(current_user,id):
  return entregadoresController.get_by_id(current_user,id)

@app.route("/entregadores/email/<email>" , methods=["GET"])
@token_required
def get_entregador_by_email(current_user,email):
  return entregadoresController.get_by_email(current_user,email)

@app.route("/entregadores", methods=["POST"])
@token_required
def add_entregadores(current_user):
  return entregadoresController.insert(current_user)

@app.route("/entregadores/<int:id>", methods=["PUT"])
@token_required
def update_entregador(current_user,id):
  return entregadoresController.update(current_user,id)

@app.route("/entregadores/<int:id>", methods=["DELETE"])
@token_required
def delete_entregador(current_user,id):
  return entregadoresController.delete(current_user,id)