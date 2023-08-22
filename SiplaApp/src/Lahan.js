import React, {
    useState,
    useEffect
} from 'react';
import {
    View,
    Text,
    StatusBar,
    Dimensions,
    StyleSheet,
    TouchableOpacity,
    Flatlist
} from 'react-native';
import Icon from "react-native-vector-icons/Feather";
import { AppBar } from "@react-native-material/core";
import { WebView } from 'react-native-webview';

const windowWidth = Dimensions.get('window').width;
const windowHeight = Dimensions.get('window').height;

const Lahan = ({navigation}) => {

    const [lisData, setlisData] = useState([]);

    useEffect(() => {
        ambilData()
    }, [])

    async function ambilData() {
        return fetch('http://172.20.10.3/MIA/api/pengguna')
            .then(res => res.json())
            .then(data => {
                setlisData(data.data)
            })
            .catch(error => {
                console.error(error);
            });
    }

    


    return (
        <View style={styles.container}>
            <StatusBar translucent barStyle={'light-content'} backgroundColor={'transparent'} />
            <AppBar
                title="PETA LOKASI LAHAN"
                titleStyle={{ fontSize: 24 }}
                style={{
                    backgroundColor: '#3b82f6',
                    paddingTop: 24,
                    paddingBottom: 6
                }}
                leading={props => (
                    <TouchableOpacity
                        onPress={() => navigation.replace("Home")}
                        style={{
                            width: 57,
                            height: 57,
                            display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center'
                        }}
                    >
                        <Icon name={'arrow-left'} size={24} color={'#ffffff'} />
                    </TouchableOpacity>
                )}
            />

            <WebView
                source={{ uri: 'http://172.20.10.3/MIA/pengguna/lahan' }} // Ganti URL dengan URL yang Anda inginkan
                style={styles.webview}
            />


        </View>
    )
}

export default Lahan

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: '#FFFFFF'
    },
    sectionConten: {
        flex: 1,
    },
    webview: {
        height: windowHeight + 100
    }
})