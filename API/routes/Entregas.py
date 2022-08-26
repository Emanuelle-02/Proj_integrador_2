from flask import Blueprint
from controllers import entregasController
from auth import token_required

app=Blueprint('entregas', __name__)

@app.route('/entregas', methods=["GET"])
@token_required
def get_entregas(current_user):
  return entregasController.get_todas_entregas(current_user)

@app.route("/entregas/<int:id>", methods=["GET"])
@token_required
def get_entrega_by_id(current_user,id):
  return entregasController.get_by_id(current_user,id)

@app.route("/entregas/<int:id_entrega>/<int:id_cliente>", methods=["GET"])
@token_required
def get_entregas_farma(current_user,id_entrega=0, id_cliente=0):
  return entregasController.get_entregas_farma(current_user,id_entrega, id_cliente)

@app.route("/entregas", methods=["POST"])
@token_required
def add_entrega(current_user):
  return entregasController.insert(current_user)

@app.route("/entregas/<int:id>", methods=["PUT"])
@token_required
def update_entrega(current_user,id):
  return entregasController.update(current_user,id)

@app.route("/entregas/<int:id>", methods=["DELETE"])
@token_required
def delete_entrega(current_user,id):
  return entregasController.delete(current_user,id)