from models import entregadoresModel

def get_todos_entregadores():
  return entregadoresModel.get_todos_entregadores()

def get_by_id(id):
  return entregadoresModel.get_by_id(id)

def input():
  return entregadoresModel.input()

def update(id):
  return entregadoresModel.update(id)

def delete(id): 
  return entregadoresModel.delete(id)