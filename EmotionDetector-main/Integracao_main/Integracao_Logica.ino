int bpmIdade(int idade){
  int bpmEsperado = 0;
  if (idade <= 7){
    bpmEsperado = 120;    // Média entre 100 - 140
  }
  if ((idade <= 17) && (idade >= 8)){
    bpmEsperado = 90;     // Média entre 100 - 80
  }
  if ((idade <= 65) && (idade >= 18)){
    bpmEsperado = 75;     // Média entre 70 - 80
  }
  if (idade > 65){
    bpmEsperado = 55;     //Média entre 50 - 60 
  }
  return bpmEsperado;
}

float mediaBpm(){ 
  int controleBpm = 0;
  int bpmVetor[30];
  float BpmMedio = 0.00;
  int conf = 0;
  int soma = 0;
  while (controleBpm < 30){
     bpm();    
      
      bpmVetor[controleBpm] = BPM;
      controleBpm++;
      Serial.print("BPM É: ");
      Serial.println(BPM);
      QS = false;
      delay(20);
    }   
   for(int i = 0; i<30; i++){
     soma = soma + bpmVetor[i];
      
   }
  BpmMedio = soma/30;         //Média primária com 30 elementos       
  BpmMedio = (bpmIdade(idade) + BpmMedio)/2;   
  return BpmMedio;
}

float bpmAtual(){
  int controleBpm = 0;
  int bpmVetor[10];
  float BpmMedio = 0.00;
  int conf = 0;
  int soma = 0;
  while (controleBpm < 10){
     
     bpm();
    if (QS == true){
      bpmVetor[controleBpm] = BPM;
      controleBpm++;
      QS = false;
      delay(5);
      }
    }   
   for(int i = 0; i<10; i++){
     
     soma = soma + bpmVetor[i];
   }
  BpmMedio = soma/10;         //Média em tempo real com 10 elementos       
  BpmMedio = (bpmIdade(idade) + BpmMedio)/2;   
  return BpmMedio;
}

void piscaLed(int led){
  
  //desliga os leds
  for(int i = 10; i <= 13; i++){
    digitalWrite(i, 0);
  }
  
  //Pisca o led 20 vezes
  for(int i = 0; i < 20; i++){
    digitalWrite(led, 1);
    delay(250);
    digitalWrite(led, 0);
    }
}

void ligaLed(int led){
  
  //desliga os leds
  for(int i = 10; i <= 13; i++){
    if(i == led){
      digitalWrite(led, 1);
    }
    else{
      digitalWrite(i, 0);
    }
  }
}

void emotionToString(int valor){
  switch (valor){
  case 1:
    emotion = "Calma";
    break;
    
  case 2:
    emotion = "Felicidade";
    break;
    
  case 3:
    emotion = "Ansiedade";
    break;
    
  case 4:
    emotion = "Estresse";
    break;

  case 5:
    emotion = exception;
    break;
    
  }
   
  
}
