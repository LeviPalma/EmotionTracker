char* convert_int16_to_str(int16_t i) { // converts int16 to string. Moreover, resulting strings will have the same length in the debug monitor.
  sprintf(tmp_str, "%6d", i);
  return tmp_str;
}

int detectaMovimento(int movimento) { // Função que contabiliza quantos movimentos ocorreram


  Wire.beginTransmission(MPU_ADDR);
  Wire.write(0x3B); // starting with register 0x3B (ACCEL_XOUT_H) [MPU-6000 and MPU-6050 Register Map and Descriptions Revision 4.2, p.40]
  Wire.endTransmission(false); // the parameter indicates that the Arduino will send a restart. As a result, the connection is kept active.
  Wire.requestFrom(MPU_ADDR, 7*2, true); // request a total of 7*2=14 registers
  
  // "Wire.read()<<8 | Wire.read();" means two registers are read and stored in the same variable
  accelerometer_x = Wire.read()<<8 | Wire.read(); // reading registers: 0x3B (ACCEL_XOUT_H) and 0x3C (ACCEL_XOUT_L)
  accelerometer_y = Wire.read()<<8 | Wire.read(); // reading registers: 0x3D (ACCEL_YOUT_H) and 0x3E (ACCEL_YOUT_L)
  accelerometer_z = Wire.read()<<8 | Wire.read(); // reading registers: 0x3F (ACCEL_ZOUT_H) and 0x40 (ACCEL_ZOUT_L)
  temperature = Wire.read()<<8 | Wire.read(); // reading registers: 0x41 (TEMP_OUT_H) and 0x42 (TEMP_OUT_L)
  gyro_x = Wire.read()<<8 | Wire.read(); // reading registers: 0x43 (GYRO_XOUT_H) and 0x44 (GYRO_XOUT_L)
  gyro_y = Wire.read()<<8 | Wire.read(); // reading registers: 0x45 (GYRO_YOUT_H) and 0x46 (GYRO_YOUT_L)
  gyro_z = Wire.read()<<8 | Wire.read(); // reading registers: 0x47 (GYRO_ZOUT_H) and 0x48 (GYRO_ZOUT_L)

  //Serial.println(accelerometer_x);
  //Serial.print("y: ");
  //Serial.println(accelerometer_y);
  if (accelerometer_x < 1750 && accelerometer_y < -1750) {        // pra direita
    digitalWrite(LED_LB, 0);
    digitalWrite(LED_RB, 0);
    digitalWrite(LED_RT, 1);
    digitalWrite(LED_LT, 1);

        //Serial.print("x: ");
    //Serial.println(accelerometer_x);
        //Serial.print("y: ");
    //Serial.println(accelerometer_y);
    
    if(controleMovimento == 1){
      if((accelerometer_x < (ultimoX * 0.5)) || (accelerometer_y < (ultimoY * 1.5))){
        movimento = movimento + 1;
        //Serial.println("movimento 1");
        //Serial.println(movimento);
      }
    }
    else{
      movimento = movimento + 1;
      }
    
    ultimoX = accelerometer_x;
    ultimoY = accelerometer_y;
    
    controleMovimento =1;

  } else if (accelerometer_x > 1750 && accelerometer_y > 1750) {    // pra baixo
    digitalWrite(LED_LB, 1);
    digitalWrite(LED_RB, 1);
    digitalWrite(LED_RT, 0);
    digitalWrite(LED_LT, 0);
        //Serial.print("x: ");
    //Serial.println(accelerometer_x);
        //Serial.print("y: ");
    //Serial.println(accelerometer_y);

    if(controleMovimento == 2){
      if((accelerometer_x > (ultimoX * 1.5)) || (accelerometer_y > (ultimoY * 1.5))){
        //Serial.println("movimento 2");
        movimento = movimento + 1;
        //Serial.println(movimento);
      }
    }
    else{
      movimento = movimento + 1;
      //Serial.println("movimento2");
      //Serial.println(movimento);
      }
    
    ultimoX = accelerometer_x;
    ultimoY = accelerometer_y;
    
    controleMovimento = 2;

  } else if (accelerometer_x > 1750 && accelerometer_y < 1750){     // pra direita
    digitalWrite(LED_LB, LOW);
    digitalWrite(LED_RB, HIGH);
    digitalWrite(LED_RT, HIGH);
    digitalWrite(LED_LT, LOW);
    //Serial.print("x: ");
    //Serial.println(accelerometer_x);
        //Serial.print("y: ");
    //Serial.println(accelerometer_y);

    if(controleMovimento == 3){
      if((accelerometer_x > (ultimoX * 1.5)) || (accelerometer_y < (ultimoY * 0.5))){
        movimento = movimento + 1;
        //Serial.println("movimento3");
        //Serial.println(movimento);
      }
    }
    else{
      //Serial.println("movimento3");
      //Serial.println(movimento);
      movimento = movimento + 1;
      }
    
    ultimoX = accelerometer_x;
    ultimoY = accelerometer_y;
    
    controleMovimento = 3;

  } else if (accelerometer_x < -1750 && accelerometer_y > 1750) {     // pra esquerda
    digitalWrite(LED_LB, HIGH);
    digitalWrite(LED_RB, LOW);
    digitalWrite(LED_RT, LOW);
    digitalWrite(LED_LT, HIGH);
    //Serial.print("x: ");
    //Serial.println(accelerometer_x);
        //Serial.print("y: ");
    //Serial.println(accelerometer_y);

    if(controleMovimento == 4){
      if((accelerometer_x < (ultimoX * 0.5)) || (accelerometer_y > (ultimoY * 1.5))){
        movimento = movimento + 1;
        //Serial.println("movimento4");
        //Serial.println(movimento);
      }
    }
    else{
      movimento = movimento + 1;
        //Serial.println("movimento4");
        //Serial.println(movimento);
      }
    
    ultimoX = accelerometer_x;
    ultimoY = accelerometer_y;
    
    controleMovimento = 4;
  }
  
return movimento;
}
