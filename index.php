<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU PRINCIPAL</title>
</head>
<style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background-color: #fafafa;
      text-align: center;
    }

    h1 {
      color: #1c1c1c;
      margin-bottom: 10px;
    }

    h2 {
      font-weight: normal;
      color: #444;
      max-width: 1600px;
      margin: 0 auto 40px;
      line-height: 1.5;
    }

    .imagens {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 40px;  /*espaco entre imagnes*/
      flex-wrap: wrap;  /*quebra de linha*/
      margin-bottom: 40px;
    }

    /* todas as imagens */
    .imagens img {
      width: 300px;  /*largura*/
      height: 500px;  /*altura*/
      object-fit: cover;
      border-radius: 10px;  /*arrendondamento de arestas*/
      box-shadow: 0 40px 50px rgba(0,0,0,0.2); /*sombra*/
      transition: transform 0.5s, box-shadow 0s;  /*delay para aplicar o "hover"*/
      cursor: pointer; /* muda o estilo do cursor*/
    }

    /* interacao ao passar o cursor do mouse */
    .ney:hover {
      transform: scale(1.1);  /*aumenta o tamanho*/
      box-shadow: 0 50px 50px rgba(255, 230, 0, 0.3);  /*sombra que aparece*/
    }

    .cr7:hover {
      transform: scale(1.1);
      box-shadow: 0 50px 50px rgba(226, 30, 30, 0.3);
    }

    .m10:hover {
      transform: scale(1.1);
      box-shadow: 0 50px 50px rgba(0, 140, 255, 0.3);
    }

    button {
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 10px 25px;
      margin: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #0056b3;
    }
</style>
<body>
    <h1 align="center">LOJA - CAMISETAS DE SELEÇÕES</h1>
 
    <h2>
        Vista sua paixão pelo futebol! Nosso site oferece camisetas oficiais
        e personalizadas das principais seleções do mundo. Modelos modernos,
        tecidos de alta qualidade e opções para torcedores de todas as idades.
        Mostre suas cores e apoie sua seleção com estilo e conforto!
    </h2>
<br><br>
    <div class="imagens">
        <a href="https://www.youtube.com/shorts/h2NPNwJaSbE">
            <img class="ney" src="https://media.revistaad.es/photos/63a1a6369113f15f7fac1b30/1:1/w_3898,h_3898,c_limit/GettyImages-1443106332.jpg%22">
        </a>

        <a href="https://www.youtube.com/shorts/sIuqGpVwe-c">
            <img class="cr7" src="https://i.pinimg.com/736x/8f/b6/8e/8fb68eda1feb26d70a5a62efbed2d05b.jpg">
        </a>

        <a href="https://www.youtube.com/shorts/aCgMakHcxu8">
            <img class="m10" src="https://odia.ig.com.br/_midias/jpg/2023/11/13/398x470/1_lionel_messi_1-31128576.jpg">
        </a>
    </div>
<br><br>
    <a href="login.php"><button>CADASTRO</button></a>
    <a href="vendas.php"><button>VENDA</button></a>
</body>
</html>