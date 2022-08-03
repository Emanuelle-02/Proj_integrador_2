from models import entregasModel

def get_todas_entregas():
  return entregasModel.get_todas_entregas()

def get_by_id(id):
  return entregasModel.get_by_id(id)

def get_entregas_farma(id_entrega, id_cliente):
  return entregasModel.get_entregas_farma(id_entrega, id_cliente)

def insert():
  return entregasModel.insert()

def update(id):
  return entregasModel.update(id)

def delete(id): 
  return entregasModel.delete(id)