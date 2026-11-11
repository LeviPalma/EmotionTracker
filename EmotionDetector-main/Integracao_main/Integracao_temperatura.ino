/*
Autores: Aaron Levi dos Santos Palma e João Pedro de Oliveira Caetano
Data: 09/12/21
Descrição: Código responsável pelo sensor de temperatura que tem como retorno a 
leitura em tempo real em graus celsius de onde estiver sendo usado o sensor.
*/

/*float TempAvg(int sensorPin){
  int total = 0;
  //digitalWrite(pinoLedR, 1);
 int amostras = 20;
  for (int i = 0; i <amostras; i++){
  total += analogRead(sensorPin);
  delay(20);  
  Serial.println(total * 1100/10240);
  }
  return total/amostras;
}*/

float SensorTemp() {
  sensors_event_t a, g, temp;          //Declaração de variáveis
  mpu.getEvent(&a, &g, &temp);         //Recebe o valor dos eventos de leitura do sensor 
  int i = 0; 
  float total = 0;
  while(i<40){                         //Testa 40 vezes
    
        total = total + temp.temperature;   //Atualiza total
        i = i +1;
        mpu.getEvent(&a, &g, &temp);
        delay(15);
        
      }
  return (total/40);          //retorna média
}
