from flask import Blueprint
from controllers import auditoriaController

app=Blueprint('auditoria', __name__)

@app.route('/auditoria', methods=["GET"])
def get_auditoria():
  return auditoriaController.get_tab_auditoria()