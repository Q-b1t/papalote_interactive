import {
    Card,
    CardImg,
    CardImgOverlay,
    CardTitle,
    CardText
} from "reactstrap";
import '../styles.css';
import React, { useState } from 'react';





function PetDisplay(){
    return(
        <div>
        <Card inverse>
            <CardImg
                alt="papalote"
                src="images/background.jpg"
                width="100%"
            />
            <CardImgOverlay>
            <div className="background_overlay">
                <CardTitle tag="h5" className="title_size">
                    ¡Bienvenido al Papalote!
                </CardTitle>

                <CardImg alt="bulbasaur" style={{width:70}} src = "/images/bulbasaur.gif"/>

                <CardText className="text_size">
                    Me llamo Bulbasaur, y me emociona ser tu acompañante el dia de hoy. A continuación, podras ver información que te sera de gran utilidad durante tu aventura:
                </CardText>
                <br/>
            </div>
            </CardImgOverlay>
        </Card>
        </div>
    );
}

export default PetDisplay;

/**
            <CardImg
            alt="background"
            src="/images/background.jpg"
            style={{
                width: 700 
            }}
            width="100%"
            /> 
 
 
 */