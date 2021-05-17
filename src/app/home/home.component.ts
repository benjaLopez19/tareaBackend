import { Component, OnInit } from '@angular/core';
import {AbstractControl,FormBuilder,FormGroup,Validators} from "@angular/forms"
import { Nota } from '../nota';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  screen = 0;
  titulo:AbstractControl;
  estado:AbstractControl;
  descripcion:AbstractControl;
  //ABIERTO==0, PROCESO==1, CERRADO==2
  aux:Array<Nota>=[];

  form:FormGroup;
  constructor(public fb: FormBuilder) {
    this.form= this.fb.group({
      titulo:["",[Validators.required]],
      estado:["",[Validators.required]],
      descripcion:["",[Validators.required]]
    });

    this.titulo = this.form.controls["titulo"];
    this.estado = this.form.controls["estado"];
    this.descripcion = this.form.controls["descripcion"]
   }

  
  ngOnInit(): void {
  }

  crear(){
    let lista:Array<Nota>=[{
      titulo:this.titulo.value,
      estado:this.estado.value,
      descripcion:this.descripcion.value
      }
    ];

    console.log(lista);

    
  }

}
