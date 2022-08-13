from .Farmacias import Farmacias
from .Entregadores import Entregadores
from .Entregas import Entregas
from .Solicitacoes import Solicitacoes
from config import db

__all__ = [
  'Farmacias',
  'Entregadores',
  'Entregas',
  'Solicitacoes'
]

db.create_all()