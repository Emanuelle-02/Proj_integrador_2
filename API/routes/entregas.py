from flask import Blueprint
from controllers import entregasController

app=Blueprint('entregas', __name__)

@app.route('/entregas', methods=["GET"])
def get_entregas():
  return entregasController.get_todas_entregas()

@app.route("/entregas/<int:id>", methods=["GET"])
def get_entrega_by_id(id):
  return entregasController.get_by_id(id)

@app.route("/entregas/<int:id>/farmacias", methods=["GET"])
def get_entregas_farma(id_entrega, id_cliente):
  return entregasController.get_entregas_farma(id_entrega, id_cliente)

@app.route("/entregas", methods=["POST"])
def add_entrega():
  return entregasController.insert()

@app.route("/entregas/<int:id>", methods=["PUT"])
def update_entrega(id):
  return entregasController.update(id)

@app.route("/entregas/<int:id>", methods=["DELETE"])
def delete_entrega(id):
  return entregasController.delete(id)