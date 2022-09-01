from flask import Blueprint
from controllers import entregasController
from auth import token_required
from models.entities.Entregas import Entregas
from datetime import date
from sqlalchemy import func
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

@app.route("/entregas/relatorio/<id_cliente>" , methods=["GET"])
@token_required
def get_client_by_id(current_user,id_cliente):
  return entregasController.get_client_by_id(current_user,id_cliente)

@app.route("/entregas/relatorio", methods=["GET"])
def get_relatorio():
  EntregasAno = Entregas.query.filter(Entregas.id_cliente == 1, Entregas.active == 'True',Entregas.created_at > date(2022, 8, 10)).count()
  entregasEfetuadas = Entregas.query.filter_by(entrega_status = 'Entregue', id_cliente = 1).count()
  EntregasCanceladas = Entregas.query.filter(Entregas.id_cliente == 1, Entregas.active == 'False',Entregas.created_at > date(2022, 8, 10)).count()
  EntregasEmAndamento = Entregas.query.filter_by(entrega_status = 'Em andamento', id_cliente = 1).count()
  valorEntregas = Entregas.query.with_entities(func.sum(Entregas.preco).label('total')).filter(Entregas.id_cliente == 1, Entregas.active == 'True').first().total  #(Entregas.id_cliente == 1,Entregas.active == 'True',Entregas.preco).sum()
  relatorio = {
    'totalEntregas': EntregasAno,
    'entregasRealizadas': entregasEfetuadas,
    "totalCancel": EntregasCanceladas,
    "totalAndamento": EntregasEmAndamento,
    "totalFrete": valorEntregas
  }

  return relatorio