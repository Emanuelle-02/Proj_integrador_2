from models import farmaciasModel

def get_todas_farmacias(current_user):
  return farmaciasModel.get_todas_farmacias(current_user)

def get_by_email(current_user,email):
  return farmaciasModel.get_by_email(current_user,email)

def get_by_id(current_user,id):
  return farmaciasModel.get_by_id(current_user,id)

def insert(current_user):
  return farmaciasModel.insert(current_user)

def update(current_user,id):
  return farmaciasModel.update(current_user,id)

def delete(current_user,id): 
  return farmaciasModel.delete(current_user,id)