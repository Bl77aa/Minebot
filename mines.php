import os
import random
import telebot
import time
from datetime import datetime
from pytz import timezone
from telebot.types import InlineKeyboardMarkup, InlineKeyboardButton

api_key='7738807884:AAGjkP_xm8dDCtFCzfNloQRgtuEYIHtA86w'
# TOKEN DO SEU BOT [https://t.me/botfather]
chat_id = '7738807884'

bot = telebot.TeleBot(api_key)

# Diretório onde o script está localizado
diretorio_script = os.path.dirname(os.path.abspath(__file__))
diretorio_imagens = os.path.join(diretorio_script, 'imagens')

# Lista os arquivos no diretório de imagens
arquivos = os.listdir(diretorio_imagens)

def enviar_imagem_aleatoria():
# Escolhe aleatoriamente uma imagem
imagem_escolhida = random.choice(arquivos)

# URL do link
url_link = 'https://oijogos.com/#/home?yqm=kvjzb7an' # Defina o link para a sua plataforma

# Define o fuso horário para Brasília
tz = timezone('America/Sao_Paulo')

# Abre a imagem selecionada
with open(os.path.join(diretorio_imagens, imagem_escolhida), 'rb') as imagem:
bot.send_photo(chat_id, imagem, caption=f"Confira mais em: {url_link}")

# Callback handler para finalizar uma ação
@bot.callback_query_handler(func=lambda call: call.data == 'finalizado')
def finalizado_callback(call):
bot.send_message(chat_id, "Ação finalizada.")

while True:
try:
bot.polling()
except Exception as e:
print(f"Erro: {e}")
time.sleep(5)