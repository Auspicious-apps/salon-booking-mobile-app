import {StyleSheet, Text, View} from 'react-native';
import React from 'react';
import Svg, {Path} from 'react-native-svg';

const Index = () => {
  return (
    <Svg width="15" height="12" viewBox="0 0 15 12" fill="none">
      <Path
        d="M13.5799 4.97467C13.8959 5.388 13.8959 5.946 13.5799 6.35867C12.5845 7.658 10.1965 10.3333 7.40854 10.3333C4.62054 10.3333 2.23254 7.658 1.2372 6.35867C1.08346 6.16075 1 5.91728 1 5.66667C1 5.41605 1.08346 5.17258 1.2372 4.97467C2.23254 3.67533 4.62054 1 7.40854 1C10.1965 1 12.5845 3.67533 13.5799 4.97467V4.97467Z"
        stroke="#8A8A8A"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <Path
        d="M7.40869 7.66663C8.51326 7.66663 9.40869 6.7712 9.40869 5.66663C9.40869 4.56206 8.51326 3.66663 7.40869 3.66663C6.30412 3.66663 5.40869 4.56206 5.40869 5.66663C5.40869 6.7712 6.30412 7.66663 7.40869 7.66663Z"
        stroke="#8A8A8A"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </Svg>
  );
};

export default Index;

const styles = StyleSheet.create({});
