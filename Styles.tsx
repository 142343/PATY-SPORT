import { StyleSheet } from "react-native";

const RegisterStyles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f8f9fa',
    justifyContent: 'space-between',
  },
  scrollContainer: {
    flexGrow: 1,
    backgroundColor: '#C5CAE9',
    justifyContent: 'center',
    paddingVertical: 20,
    paddingHorizontal: 15
  },
  form: {
    width: '100%',
    backgroundColor: '#dcdcdc',
    padding: 25,
    borderRadius: 12,
    shadowColor: "#000",
    shadowOffset: {
      width: 0,
      height: 2,
    },
    shadowOpacity: 0.1,
    shadowRadius: 3.84,
    elevation: 5,
  },
  formTitleContainer: {
    marginBottom: 25,
    alignItems: 'center',
  },
  formText: {
    fontWeight: 'bold',
    fontSize: 24,
    textAlign: 'center',
    marginBottom: 10,
    color: '#333',
  },
  formDivider: {
    height: 3,
    width: 60,
    backgroundColor: '#6610f2',
    borderRadius: 2,
  },
  formRow: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    marginBottom: 25,
  },
  formHalf: {
    width: '48%',
  },
  formLabel: {
    color: '#6610f2',
    marginBottom: 6,
    fontSize: 14,
    fontWeight: 'bold',
  },
  inputContainer: {
    position: 'relative',
    flexDirection: 'row',
    alignItems: 'center',
  },
  formSelect: {
    backgroundColor: '#ffffff',
    borderRadius: 8,
    padding: 12,
    borderWidth: 1.5,
    borderColor: '#e0e0e0',
    justifyContent: 'space-between',
    flexDirection: 'row',
    alignItems: 'center',
  },
  formSelectActive: {
    borderColor: '#6610f2',
  },
  formSelectText: {
    color: '#9e9e9e',
  },
  formSelectTextActive: {
    color: '#333',
    fontWeight: '500',
  },
  dropdownIcon: {
    color: '#6610f2',
    fontSize: 12,
  },
  formInput: {
    backgroundColor: '#ffffff',
    borderRadius: 8,
    padding: 12,
    borderWidth: 1.5,
    borderColor: '#e0e0e0',
    flex: 1,
    fontSize: 14,
  },
  formInputFocused: {
    borderColor: '#6610f2',
    borderWidth: 1.5,
  },
  checkIcon: {
    position: 'absolute',
    right: 10,
    fontSize: 16,
    color: '#4CAF50',
  },
  registerButton: {
    backgroundColor: '#4CAF50',
    paddingVertical: 14,
    paddingHorizontal: 40,
    borderRadius: 25,
    alignItems: 'center',
    justifyContent: 'center',
    width: '80%',
    shadowColor: "#4CAF50",
    shadowOffset: {
      width: 0,
      height: 2,
    },
    shadowOpacity: 0.3,
    shadowRadius: 3.84,
    elevation: 5,
    flexDirection: 'row',
  },
  registerButtonDisabled: {
    backgroundColor: '#a5d6a7',
    shadowOpacity: 0.1,
  },
  registerButtonText: {
    color: 'white',
    fontWeight: 'bold',
    fontSize: 16,
  },
  registerButtonIcon: {
    color: 'white',
    fontSize: 18,
    marginLeft: 10,
    fontWeight: 'bold',
  },
  loginContainer: {
    flexDirection: 'row',
    justifyContent: 'center',
    marginTop: 25,
  },
  loginText: {
    fontSize: 14,
    color: '#666',
  },
  loginLink: {
    fontSize: 14,
    color: '#6610f2',
    fontWeight: 'bold',
    marginLeft: 5,
  },
  headerContainer: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    padding: 15,
    backgroundColor: '#212529',
    borderBottomColor: '#333',
    borderBottomWidth: 1,
  },
  backButton: {
    width: 30,
    height: 30,
    justifyContent: 'center',
    alignItems: 'center',
  },
  headerTitle: {
    color: 'white',
    fontSize: 18,
    fontWeight: 'bold',
  },
  headerButton: {
    color: 'white',
    fontSize: 22,
  },
  footer: {
    backgroundColor: '#000',
    padding: 12,
    alignItems: 'center',
  },
  footerText: {
    color: 'white',
    fontSize: 12,
  },

  // Modal styles
  modalOverlay: {
    flex: 1,
    backgroundColor: 'rgba(0,0,0,0.5)',
    justifyContent: 'center',
    alignItems: 'center',
  },
  modalContainer: {
    justifyContent: 'center',
    alignItems: 'center',
    width: '100%',
  },
  modalContent: {
    width: '80%',
    backgroundColor: 'white',
    borderRadius: 12,
    padding: 25,
    maxHeight: '60%',
    shadowColor: "#000",
    shadowOffset: {
      width: 0,
      height: 5,
    },
    shadowOpacity: 0.34,
    shadowRadius: 6.27,
    elevation: 10,
  },
  modalTitle: {
    fontSize: 18,
    fontWeight: 'bold',
    textAlign: 'center',
    color: '#6610f2',
  },
  modalDivider: {
    height: 2,
    backgroundColor: '#f0f0f0',
    marginVertical: 15,
    width: '100%',
  },
  modalItem: {
    paddingVertical: 13,
    borderBottomWidth: 1,
    borderBottomColor: '#f0f0f0',
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
  },
  modalItemSelected: {
    backgroundColor: '#f3f0ff',
  },
  modalItemText: {
    fontSize: 15,
    color: '#333',
  },
  modalItemTextSelected: {
    color: '#6610f2',
    fontWeight: '500',
  },
  modalItemSelectedIcon: {
    color: '#6610f2',
    fontSize: 16,
  },
  closeButton: {
    marginTop: 20,
    backgroundColor: '#6610f2',
    padding: 12,
    borderRadius: 25,
    alignItems: 'center',
    shadowColor: "#6610f2",
    shadowOffset: {
      width: 0,
      height: 2,
    },
    shadowOpacity: 0.3,
    shadowRadius: 2.84,
    elevation: 3,
  },
  closeButtonText: {
    color: 'white',
    fontWeight: 'bold',
    fontSize: 15,
  }
});

export default RegisterStyles;