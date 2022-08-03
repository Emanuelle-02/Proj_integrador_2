from models import solicitacoesModel

def get_todas_solicitacoes():
  return solicitacoesModel.get_todas_solicitacoes()

def get_by_id(id):
  return solicitacoesModel.get_by_id(id)

def insert():
  return solicitacoesModel.insert()

def update(id):
  return solicitacoesModel.update(id)

def delete(id): 
  return solicitacoesModel.delete(id)