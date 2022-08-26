from models import entregadoresModel

def get_todos_entregadores(current_user):
  return entregadoresModel.get_todos_entregadores(current_user)

def get_by_id(current_user,id):
  return entregadoresModel.get_by_id(current_user,id)

def get_by_email(current_user,email):
  return entregadoresModel.get_by_email(current_user,email)

def insert(current_user):
  return entregadoresModel.insert(current_user)

def update(current_user,id):
  return entregadoresModel.update(current_user,id)

def delete(current_user,id): 
  return entregadoresModel.delete(current_user,id)