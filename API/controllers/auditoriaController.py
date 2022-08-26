from models import auditoriaModel

def get_tab_auditoria(current_user):
  return auditoriaModel.get_tab_auditoria(current_user)