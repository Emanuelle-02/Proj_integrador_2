from flask import Blueprint
from controllers import auditoriaController
from auth import token_required

app=Blueprint('auditoria', __name__)

@app.route('/auditoria', methods=["GET"])
@token_required
def get_auditoria(current_user):
  return auditoriaController.get_tab_auditoria(current_user)