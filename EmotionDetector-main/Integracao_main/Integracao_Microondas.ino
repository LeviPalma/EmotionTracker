/*
Autores: Aaron Levi dos Santos Palma e João Pedro de Oliveira Caetano
Data: 09/12/21
Descrição: Código responsável pelo sensor de Microondas que tem como retorno a 
detecção de movimento vinda de fontes de calor próximas a ele.
*/

boolean detectaAgitacao(){
  boolean resposta;
  if(digitalRead(pinoMicroondas) == HIGH){      //SE LEITURA DO PINO FOR IGUAL A HIGH, FAZ
    resposta = true; //ACENDE O LED
  }
  else{ //SENÃO, FAZ
    resposta = false;  //APAGA O LED
  }
  return resposta;
}
