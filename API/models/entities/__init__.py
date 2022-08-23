from .Farmacias import Farmacias
from .Entregadores import Entregadores
from .Entregas import Entregas
from config import db

__all__ = [
  'Farmacias',
  'Entregadores',
  'Entregas',
]

db.create_all()