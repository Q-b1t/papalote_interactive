import {
    Card,
    CardImg,
    CardImgOverlay,
    CardTitle,
    CardText
} from "reactstrap";
import '../styles.css';
import InitialInstructions from './InitialInstructions';

function PetDisplay(){
    return(
        <div>
        <Card inverse>
            <CardImg
            alt="background"
            src="/images/background.jpg"
            style={{
                width: 700 
            }}
            width="100%"
            />
            <CardImgOverlay>
            <div className="background_overlay">
                <CardTitle tag="h5">
                    ¡Bienvenido al Papalote!
                </CardTitle>

                <CardImg alt="bulbasaur" style={{width:150}} src = "/images/bulbasaur.gif"/>

                <CardText>
                    Me llamo Bulbasaur, y me emociona ser tu acompañante el dia de hoy. A continuación, podras ver información que te sera de gran utilidad durante tu aventura:

                </CardText>
                
                <InitialInstructions/>

            </div>
            </CardImgOverlay>
        </Card>
        </div>
    );
}

export default PetDisplay;