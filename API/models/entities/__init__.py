from .Farmacias import Farmacias
from .Entregadores import Entregadores
from .Entregas import Entregas
from .Auditoria  import Auditoria
from config import db

__all__ = [
  'Farmacias',
  'Entregadores',
  'Entregas',
  'Auditoria',
]

db.create_all()