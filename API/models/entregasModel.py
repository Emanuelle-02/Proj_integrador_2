from config import db
from .entities import Entregas
from flask import jsonify, request
from pycep_correios import get_address_from_cep, WebService, exceptions
import re

def get_todas_entregas():
  entregas = Entregas.query.all()
  return jsonify([entrega.to_json() for entrega in entregas]), 200

def get_by_id(id):
  entregas = Entregas.query.get(id)
  if entregas is None:
    return "Not found", 404
  return jsonify(entregas.to_json())

def get_entregas_farma(id_entrega, id_cliente):
  entregas = Entregas.query.filter_by(id_entrega = id_entrega, id_cliente = id_cliente).first()
  if entregas is None:
    return {"error": "Not found"}, 404
  return jsonify(entregas.to_json())

def insert():
  if request.is_json:
    body = request.get_json()
    entregas = Entregas (
    )

    if('cep' in body):
      cepDestino = tratarCep(body['cep'])
      if(verificaCep(cepDestino) == ''):
          
          return {"error": "CEP destino inválido"}, 400
      else:
          cepNum = verificaCep(cepDestino)
          
          valor = calculaEntrega(cepNum)
          print(valor)
          print(cepNum)
          entregas.cidade = cepNum # insere o nome da cidade referente ao  cep informado na coluna cidade do BD          
          entregas.preco =  valor 

    if("id_cliente" in body):
      entregas.id_cliente = body['id_cliente'], 
    if("medicamento" in body):
      entregas.medicamento = body['medicamento'],
    if("nome" in body):
      entregas.nome = body['nome'],
    if("rua" in body):
      entregas.rua = body['rua'],
    if("numero" in body):
      entregas.numero = body['numero'],
    if("bairro" in body):
      entregas.bairro = body['bairro'],
    if("cep" in body):
      entregas.cep = body['cep'],
    
    db.session.add(entregas)
    db.session.commit()
    return jsonify(entregas.to_json()), 201
  return {"error": "Request must be JSON"}, 415

def update(id):
  if request.is_json:
    body = request.get_json()
    entrega = Entregas.query.get(id)
    if entrega is None:
      return "Not found", 404
    if("medicamento" in body):
      entrega.medicamento = body["medicamento"]
    if("nome" in body):
      entrega.nome = body["nome"]
    if("rua" in body):
      entrega.rua = body["rua"]
    if("numero" in body):
      entrega.numero = body["numero"]
    if("bairro" in body):
      entrega.bairro = body["bairro"]
    if("cep" in body):
      entrega.cep = body["cep"]
    if("active" in body):
      entrega.active = body["active"]
    if("id_cliente" in body):
      entrega.id_cliente = body["id_cliente"]
    if("id_entregador" in body):
      entrega.id_entregador = body["id_entregador"]
    if("entrega_status" in body):
      entrega.entrega_status = body["entrega_status"]
    db.session.add(entrega)
    db.session.commit()
    return "atualizado com sucesso", 200
  return {"error": "Request must be JSON"}, 415

def delete(id):
  entrega = Entregas.query.get(id)
  if entrega is None:
      return "Not found", 404
  entrega.active = False
  db.session.add(entrega)
  db.session.commit()
  return "deletado com sucesso", 200


# Tratamento e API CEP 
def tratarCep(cep):
    #coloca um limite de caracteres na variável
    saida = cep[0:9]
    #retira caracteres, deixando só os números
    cepTratado = re.sub(r"[^0-9]","", saida)
    
    return cepTratado

def verificaCep(cepRecebido):
    try:
        cep = get_address_from_cep(cepRecebido, webservice=WebService.CORREIOS)
        cidadeCep = cep['cidade']
        
    except exceptions.InvalidCEP as eic:
        print(eic)
        return eic

    except exceptions.CEPNotFound as ecnf:
        print(ecnf)
        return ecnf

    except exceptions.ConnectionError as errc:
        print(errc)
        return errc

    except exceptions.Timeout as errt:
        print(errt)
        return errt

    except exceptions.HTTPError as errh:
        print(errh)
        return errh

    except exceptions.BaseException as e:
        print(e)
        return e
        
    return cidadeCep

def calculaEntrega(destino):   
    valorEntrega = 0
    if destino == 'Pau dos Ferros':
        valorEntrega = 10

    if destino == 'Encanto' or destino == 'Rafael Fernandes' or destino == 'Francisco Dantas':
        valorEntrega = 20      
        
    if destino == 'Riacho de Santana' or destino == 'José da Penha':
        valorEntrega = 30      

    return valorEntrega
