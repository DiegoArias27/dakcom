# crear_bomba.py solo en caso de que algun error de git no haya subido el comprimido 
contenido = b"DAKCOMSEGURO1234" * 1024  
tamanio_deseado = 1024 * 1024 * 1024  # 1 GB
escrito = 0

with open("bomb1G.txt", "wb") as f:
    while escrito < tamanio_deseado:
        f.write(contenido)
        escrito += len(contenido)
