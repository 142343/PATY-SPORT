import React, { useState } from "react";
import { ApiDelivery } from "../../../Data/sources/remote/api/ApiDelivery";
import { RegisterAuthUseCase } from "../../../Dominio/useCases/auth/RegisterAuth";

const RegisterViewModel = () => {
  const [values, setValues] = useState({
    Tipo_Documento: "",
    Num_Documento: "",
    Nombres: "",
    Apellidos: "",
    Teléfono: "",
    Correo: "",
    Password: "",
  });

  const onChange = (property: string, value: any) => {
    setValues({ ...values, [property]: value });
  };

  const register = async () => {
    const response = await RegisterAuthUseCase(values as any);
    console.log ("result" + JSON.stringify(response));
  }


  return {
    ...values,
    onChange,
    register
  };
};

export default RegisterViewModel;

