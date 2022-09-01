from models import entregasModel

def get_todas_entregas(current_user):
  return entregasModel.get_todas_entregas(current_user)

def get_by_id(current_user,id):
  return entregasModel.get_by_id(current_user,id)

def get_entregas_farma(current_user, id_entrega, id_cliente):
  return entregasModel.get_entregas_farma(current_user, id_entrega, id_cliente)

def insert(current_user):
  return entregasModel.insert(current_user)

def update(current_user,id):
  return entregasModel.update(current_user,id)

def delete(current_user,id): 
  return entregasModel.delete(current_user,id)

def get_client_by_id(current_user,id_cliente): 
  return entregasModel.get_client_by_id(current_user,id_cliente)

def get_relatorio(id_cliente):
  return entregasModel.get_relatorio(id_cliente)