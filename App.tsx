import * as React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { HomeScreen } from './src/Presentation/views/home/home';
import { RegisterScreen } from './src/Presentation/views/register/register';
import { ProfileInfoScreen } from './src/Presentation/views/profile/info/ProfileInfo';
import { DashboardScreen } from './src/Presentation/views/dashboard/DashboardScreen';

export type RootStackParamList = {
  HomeScreen: undefined;
  RegisterScreen: undefined;
  ProfileInfoScreen: undefined;
  DashboardScreen: undefined;
};

const Stack = createNativeStackNavigator<RootStackParamList>();

const App = () => {
  return (
    <NavigationContainer>
      <Stack.Navigator screenOptions={{
        headerShown: false
      }}>
        <Stack.Screen
          name="HomeScreen"
          component={HomeScreen}
        />
        <Stack.Screen
          name="RegisterScreen"
          component={RegisterScreen}
          options={{
            headerShown: true,
            title: 'Registro',
          }}
        />
        <Stack.Screen
          name="DashboardScreen"
          component={DashboardScreen}
        />
        <Stack.Screen
          name='ProfileInfoScreen'
          component={ProfileInfoScreen}
        />
      </Stack.Navigator>
    </NavigationContainer>
  );
};

export default App;