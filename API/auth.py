import jwt
from flask import jsonify , request
from functools import wraps
from models import entities
from config import app

def token_required(f):
  @wraps(f)
  def decorated(*args, **kwargs):
      token = None
      if 'x-access-token' in request.headers:
          token = request.headers['x-access-token']
      if not token:
          return jsonify({'message' : 'Token is missing!'}), 401
      try: 
          data = jwt.decode(token, app.config['SECRET_KEY'], options={'verify_signature': False})
          current_user = entities.Farmacias.query.filter_by(email = data['email']).first()
      except:
          return jsonify({'message' : 'Token is invalid!'}), 401
      return f(current_user, *args, **kwargs)
  return decorated