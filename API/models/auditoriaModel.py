from config import db
from .entities import Auditoria
from flask import jsonify, request

def get_tab_auditoria():
    auditoria = Auditoria.query.all()
    return jsonify([audit.to_json() for audit in auditoria]), 200