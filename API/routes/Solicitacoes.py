from flask import Blueprint
from controllers import solicitacoesController

app=Blueprint('solicitacoes', __name__)

@app.route('/solicitacoes', methods=["GET"])
def get_solicitacoes():
  return solicitacoesController.get_todas_solicitacoes()

@app.route("/solicitacoes/<int:id>", methods=["GET"])
def get_solicitacao_by_id(id):
  return solicitacoesController.get_by_id(id)

@app.route("/solicitacoes", methods=["POST"])
def add_solicitacao():
  return solicitacoesController.insert()

@app.route("/solicitacoes/<int:id>", methods=["PUT"])
def update_solicitacao(id):
  return solicitacoesController.update(id)

@app.route("/solicitacoes/<int:id>", methods=["DELETE"])
def delete_solicitacao(id):
  return solicitacoesController.delete(id)