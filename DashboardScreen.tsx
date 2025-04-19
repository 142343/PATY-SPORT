import React, { useEffect, useRef } from 'react';
import {
    View,
    Text,
    StyleSheet,
    TouchableOpacity,
    Image,
    Animated,
    StatusBar
} from 'react-native';
import { StackScreenProps } from '@react-navigation/stack';
import { RootStackParamList } from '../../../../App';
import { FontAwesome } from '@expo/vector-icons';
import useViewModel from '../profile/info/ViewModal';

interface Props extends StackScreenProps<RootStackParamList, 'DashboardScreen'> {}

export const DashboardScreen = ({ navigation }: Props) => {
    const { removeSeccion } = useViewModel();

    const handleLogout = () => {
        removeSeccion();
        navigation.navigate('HomeScreen');
    };

    // Animación de rotación
    const rotateValue = useRef(new Animated.Value(0)).current;

    useEffect(() => {
        Animated.loop(
            Animated.timing(rotateValue, {
                toValue: 1,
                duration: 4000,
                useNativeDriver: true,
            })
        ).start();
    }, []);

    const rotateInterpolate = rotateValue.interpolate({
        inputRange: [0, 1],
        outputRange: ['0deg', '360deg'],
    });

    const rotatingStyle = {
        transform: [{ rotate: rotateInterpolate }],
    };

    return (
        <View style={styles.container}>
            <StatusBar backgroundColor="#1f2029" barStyle="light-content" />

            {/* Header */}
            <View style={styles.header}>
                <Text style={styles.headerTitle}>Deporte & Estilo</Text>
                <FontAwesome name="user" size={24} color="white" />
            </View>

            {/* Background Image */}
            <Image
                source={require('../../../../assets/fond.jpeg')}
                style={styles.backgroundImage}
            />

            {/* Content */}
            <View style={styles.content}>
                <Text style={styles.welcomeText}>¡Bienvenido al Sistema!</Text>
                <Text style={styles.welcomeText1}>PATY SPORT</Text>
                <Text style={styles.subText}>Seleccione una opción:</Text>

                <TouchableOpacity
                    style={styles.optionButton}
                    onPress={() => navigation.navigate('ProfileInfoScreen')}
                >
                    <FontAwesome name="cubes" size={24} color="#25d366" style={styles.buttonIcon} />
                    <Text style={styles.buttonText}>Inventario Productos</Text>
                </TouchableOpacity>

                {/* Imagen giratoria */}
                <Animated.Image
                    source={require('../../../../assets/imagen_products-removebg.png')}
                    style={[styles.middleImage, rotatingStyle]}
                />

                <TouchableOpacity
                    style={[styles.optionButton, styles.greenLogoutButton]}
                    onPress={handleLogout}
                >
                    <FontAwesome name="sign-out" size={24} color="white" style={styles.buttonIcon} />
                    <Text style={styles.buttonText}>Cerrar Sesión</Text>
                </TouchableOpacity>
            </View>

            {/* Footer */}
            <View style={styles.footer}>
                <Text style={styles.footerText}>
                    Contacto: Patysport69@gmail.com | Teléfono: 3102283419
                </Text>
            </View>
        </View>
    );
};

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: '#1f2029',
    },
    header: {
        flexDirection: 'row',
        justifyContent: 'space-between',
        alignItems: 'center',
        padding: 20,
        backgroundColor: '#000', // negro puro
        zIndex: 2, // <- Esto lo hace estar por encima
    },
    
    
    headerTitle: {
        fontSize: 22,
        fontWeight: 'bold',
        color: 'white',
    },
    backgroundImage: {
        position: 'absolute',
        width: '100%',
        height: '100%',
        opacity: 0.70,
    },
    content: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        padding: 20,
    },
    welcomeText: {
        fontSize: 26,
        fontWeight: 'bold',
        color: 'white',
        marginBottom: 10,
        textAlign: 'center',
    },
    welcomeText1: {
        fontSize: 32,
        fontWeight: 'bold',
        textAlign: 'center',
        color: '#4361ee',
        textShadowColor: 'rgba(0, 29, 144, 0.7)',
        textShadowOffset: { width: 0, height: 7 },
        textShadowRadius: 10,
        letterSpacing: 1,
        marginTop: -15,
    },
    subText: {
        fontSize: 16,
        color: 'white',
        marginBottom: 40,
        textAlign: 'center',
    },
    optionButton: {
        flexDirection: 'row',
        alignItems: 'center',
        backgroundColor: '#272a38',
        borderRadius: 10,
        padding: 15,
        marginBottom: 20,
        width: '80%',
        borderLeftWidth: 5,
        borderLeftColor: '#25d366',
    },
    greenLogoutButton: {
        marginTop: 40,
        backgroundColor: '#25d366',
        borderLeftColor: '#1da955',
    },
    buttonIcon: {
        marginRight: 15,
    },
    buttonText: {
        fontSize: 18,
        color: 'white',
        fontWeight: '500',
    },
    middleImage: {
        width: 220,
        height: 220,
        marginVertical: 30,
        resizeMode: 'contain',
        borderRadius: 90,
    },
    footer: {
        padding: 15,
        backgroundColor: '#000', // Negro puro
        alignItems: 'center',
    },
    
    footerText: {
        color: '#aaa',
        fontSize: 12,
    },
});
