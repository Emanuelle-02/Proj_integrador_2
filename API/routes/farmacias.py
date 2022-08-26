from flask import Blueprint
from controllers import farmaciasController
from auth import token_required
from sqlalchemy import func
from flask import jsonify

app=Blueprint('farmacias', __name__)

@app.route('/farmacias', methods=["GET"])
@token_required
def get_farmacias(current_user):
  return farmaciasController.get_todas_farmacias(current_user)

@app.route("/farmacias/<int:id>", methods=["GET"])
@token_required
def get_farmacia_by_id(current_user, id):
  return farmaciasController.get_by_id(current_user,id)

@app.route("/farmacias/email/<email>" , methods=["GET"])
@token_required
def get_entregador_by_email(current_user, email):
  return farmaciasController.get_by_email(current_user, email)

@app.route("/farmacias", methods=["POST"])
@token_required
def add_farmacia(current_user):
  return farmaciasController.insert(current_user)

@app.route("/farmacias/<int:id>", methods=["PUT"])
@token_required
def update_farmacias(current_user, id):
  return farmaciasController.update(current_user, id)

@app.route("/farmacias/<int:id>", methods=["DELETE"])
@token_required
def delete_farmacia(current_user, id):
  return farmaciasController.delete(current_user,id)