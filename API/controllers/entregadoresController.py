from models import entregadoresModel

def get_todos_entregadores():
  return entregadoresModel.get_todos_entregadores()

def get_by_id(id):
  return entregadoresModel.get_by_id(id)

def insert():
  return entregadoresModel.insert()

def update(id):
  return entregadoresModel.update(id)

def delete(id): 
  return entregadoresModel.delete(id)