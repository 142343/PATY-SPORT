import React from "react";
import { RemoveUserLocalUseCase } from "../../../../Dominio/useCases/UserLocal/RemoveUserLocal";


export const ProfileInfoViewModel = () => {
    const removeSeccion = async () => {
        await RemoveUserLocalUseCase();
    }
    return {
        removeSeccion
    }
}

export default ProfileInfoViewModel;