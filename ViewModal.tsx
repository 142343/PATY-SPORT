import React from "react";
import { RemoveUserLocalUseCase } from "../../../Dominio/useCases/UserLocal/RemoveUserLocal";



export const Usuario = () => {
    const removeSeccion = async () => {
        await RemoveUserLocalUseCase();
    }
    return {
        removeSeccion
    }
}

export default Usuario;