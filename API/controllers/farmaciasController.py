from models import farmaciasModel

def get_todas_farmacias():
  return farmaciasModel.get_todas_farmacias()

def get_by_email(email):
  return farmaciasModel.get_by_email(email)

def get_by_id(id):
  return farmaciasModel.get_by_id(id)

def insert():
  return farmaciasModel.insert()

def update(id):
  return farmaciasModel.update(id)

def delete(id): 
  return farmaciasModel.delete(id)