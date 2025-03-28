import React, { useState } from 'react';
import { View, Text, ScrollView, TouchableOpacity, TextInput, Modal, Alert } from 'react-native';
import { useNavigation } from '@react-navigation/native';
import Icon from 'react-native-vector-icons/Ionicons';
import useViewModel from './viewModel';
import style from './Styles';

export const RegisterScreen = () => {
  const navigation = useNavigation();
  const { Tipo_Documento, Num_Documento, Nombres, Apellidos, Teléfono, Correo, Password, onChange, register } = useViewModel();
  const [showPassword, setShowPassword] = useState(false);
  const [showDocumentoModal, setShowDocumentoModal] = useState(false);

  const documentoOptions = [
    { label: 'Seleccione un tipo de documento...', value: '' },
    { label: 'C.C', value: 'C.C' },
    { label: 'PPT', value: 'PPT' },
    { label: 'T.I', value: 'T.I' }
  ];

  const goBack = () => {
    navigation.goBack();
  };

  const getDocumentoLabel = () => {
    const option = documentoOptions.find(option => option.value === Tipo_Documento);
    return option ? option.label : 'Seleccione un tipo de documento...';
  };

  // Función para reiniciar los campos del formulario
  const resetForm = () => {
    onChange('Tipo_Documento', '');
    onChange('Num_Documento', '');
    onChange('Nombres', '');
    onChange('Apellidos', '');
    onChange('Teléfono', '');
    onChange('Correo', '');
    onChange('Password', '');
  };

  // Función que maneja el registro: registra, muestra alerta y limpia el formulario
  const handleRegister = async () => {
    try {
      await register(); // Se asume que register retorna una Promise
      Alert.alert(
        "¡Genial!",
        "Usuario registrado exitosamente 😄",
        [
          {
            text: "Ok",
            onPress: () => resetForm(),
          },
        ],
        { cancelable: false }
      );
    } catch (error) {
      Alert.alert("Error", "Ocurrió un error al registrar el usuario");
    }
  };

  return (
    <View style={style.container}>
      {/* Header */}
      <View style={style.headerContainer}>
        <TouchableOpacity onPress={goBack}>
          <Text style={style.headerButton}>Atrás</Text>
        </TouchableOpacity>
        <Text style={style.headerTitle}>Deporte & Estilo</Text>
        <TouchableOpacity>
          <Text style={style.headerButton}></Text>
        </TouchableOpacity>
      </View>
      
      <ScrollView contentContainerStyle={style.scrollContainer}>
        <View style={style.form}>
          <Text style={style.formText}>Registro de Usuario</Text>

          {/* Tipo de Documento y Número de Documento */}
          <View style={style.formRow}>
            <View style={style.formHalf}>
              <Text style={style.formLabel}>Tipo De Documento</Text>
              <TouchableOpacity 
                style={style.formSelect}
                onPress={() => setShowDocumentoModal(true)}
              >
                <Text>{getDocumentoLabel()}</Text>
              </TouchableOpacity>
            </View>

            <View style={style.formHalf}>
              <Text style={style.formLabel}>Número de Documento</Text>
              <TextInput
                style={style.formInput}
                placeholder="Ingrese su número de documento"
                keyboardType="numeric"
                value={Num_Documento}
                onChangeText={(text) => onChange('Num_Documento', text)}
              />
            </View>
          </View>

          {/* Nombres y Apellidos */}
          <View style={style.formRow}>
            <View style={style.formHalf}>
              <Text style={style.formLabel}>Nombres</Text>
              <TextInput
                style={style.formInput}
                placeholder="Ingrese sus nombres"
                value={Nombres}
                onChangeText={(text) => onChange('Nombres', text)}
              />
            </View>

            <View style={style.formHalf}>
              <Text style={style.formLabel}>Apellidos</Text>
              <TextInput
                style={style.formInput}
                placeholder="Ingrese sus apellidos"
                value={Apellidos}
                onChangeText={(text) => onChange('Apellidos', text)}
              />
            </View>
          </View>

          {/* Teléfono y Correo Electrónico */}
          <View style={style.formRow}>
            <View style={style.formHalf}>
              <Text style={style.formLabel}>Teléfono</Text>
              <TextInput
                style={style.formInput}
                placeholder="Ingrese su teléfono"
                keyboardType="phone-pad"
                maxLength={10}
                value={Teléfono}
                onChangeText={(text) => onChange('Teléfono', text)}
              />
            </View>

            <View style={style.formHalf}>
              <Text style={style.formLabel}>Correo Electrónico</Text>
              <TextInput
                style={style.formInput}
                placeholder="Ingrese su correo electrónico"
                keyboardType="email-address"
                value={Correo}
                onChangeText={(text) => onChange('Correo', text)}
              />
            </View>
          </View>

          {/* Contraseña con botón de visibilidad */}
          <View style={style.formFull}>
            <Text style={style.formLabel}>Contraseña</Text>
            <View style={style.passwordContainer}>
              <TextInput
                style={style.passwordInput}
                placeholder="Ingrese su contraseña"
                keyboardType="default"
                value={Password}
                onChangeText={(text) => onChange('Password', text)}
                secureTextEntry={!showPassword}
              />
              <TouchableOpacity onPress={() => setShowPassword(!showPassword)}>
                <Icon 
                  name={showPassword ? "eye-off-outline" : "eye-outline"} 
                  size={24} 
                  color="gray"
                />
              </TouchableOpacity>
            </View>
          </View>

          <View style={{ marginTop: 30, alignItems: 'center' }}>
            <TouchableOpacity style={style.registerButton} onPress={handleRegister}>
              <Text style={style.registerButtonText}>Registrarse</Text>
            </TouchableOpacity>
          </View>

          <View style={style.loginContainer}>
            <Text style={style.loginText}>¿Ya tienes una cuenta?</Text>
            <TouchableOpacity onPress={goBack}>
              <Text style={style.loginLink}>Iniciar sesión</Text>
            </TouchableOpacity>
          </View>
        </View>
      </ScrollView>

      {/* Modal para seleccionar el tipo de documento */}
      <Modal
        visible={showDocumentoModal}
        transparent={true}
        animationType="slide"
        onRequestClose={() => setShowDocumentoModal(false)}
      >
        <View style={style.modalOverlay}>
          <View style={style.modalContent}>
            <Text style={style.modalTitle}>Seleccione tipo de documento</Text>
            {documentoOptions.map((item) => (
              <TouchableOpacity
                key={item.value}
                style={style.modalItem}
                onPress={() => {
                  onChange('Tipo_Documento', item.value);
                  setShowDocumentoModal(false);
                }}
              >
                <Text style={style.modalItemText}>{item.label}</Text>
              </TouchableOpacity>
            ))}
            <TouchableOpacity 
              style={style.closeButton}
              onPress={() => setShowDocumentoModal(false)}
            >
              <Text style={style.closeButtonText}>Cerrar</Text>
            </TouchableOpacity>
          </View>
        </View>
      </Modal>

      {/* Footer */}
      <View style={style.footer}>
        <Text style={style.footerText}>Contacto: Patysport90@gmail.com | Teléfono: 3102283419</Text>
      </View>
    </View>
  );
};

export default RegisterScreen;
