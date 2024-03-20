<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $slug = 'bookings';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Section 1')
                    ->schema([
                        Select::make('church_id')
                            ->options([
                                '1' => 'James',
                                '2' => 'Mitch'
                            ])
                            ->live()
                            ->searchable()
                            ->preload()
                            ->required(),

                        DatePicker::make('date')
                            ->native(false)
                            ->required()
                            ->closeOnDateSelection()
                            ->live(),

                        Select::make('slot_id')
                            ->options([
                                '1' => '10:00',
                                '2' => '11:00',
                                '3' => '14:00',
                            ])
                            ->visible(fn (Get $get) => $get('date') && $get('church_id'))
                            ->required(),
                    ]),

                Section::make('Section 2')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                    ]),

                Section::make('Section 3')
                    ->schema([
                        DatePicker::make('date_of_birth')
                            ->native(false)
                            ->closeOnDateSelection()
                            ->required()
                            ->maxDate(now())
                            ->before(now()),
                    ]),

                Section::make('Section 4')
                    ->schema([
                        DatePicker::make('date_of_wedding')
                            ->maxDate(now())
                            ->native(false)
                            ->closeOnDateSelection()
                            ->before(now())
                            ->required(),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
